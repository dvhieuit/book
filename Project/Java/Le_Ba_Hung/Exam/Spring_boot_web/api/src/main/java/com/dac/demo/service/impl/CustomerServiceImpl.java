package com.dac.demo.service.impl;

import com.dac.demo.constant.CustomerConst;
import com.dac.demo.constant.CustomerSignInConst;
import com.dac.demo.constant.CustomerSignUpConst;
import com.dac.demo.constant.ShopConst;
import com.dac.demo.entity.*;
import com.dac.demo.model.ServiceResult;
import com.dac.demo.model.enums.RoleName;
import com.dac.demo.model.enums.StatusName;
import com.dac.demo.model.resp.CustomerGetInfoResponse;
import com.dac.demo.model.resp.CustomerSignInSignUpResponse;
import com.dac.demo.model.resp.CustomerUpdateInfoResponse;
import com.dac.demo.repository.*;
import com.dac.demo.service.CustomerService;
import com.dac.demo.utils.jwt.JwtProvider;
import io.jsonwebtoken.Jwts;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.authentication.UsernamePasswordAuthenticationToken;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;


@Service
public class CustomerServiceImpl implements CustomerService {

    @Autowired
    EmployeeRepository employeeRepository;

    @Autowired
    RoleRepository roleRepository;

    @Autowired
    StatusRepository statusRepository;

    @Autowired
    JWTRepository jwtRepository;


    @Autowired
    AuthenticationManager authenticationManager;

    @Autowired
    JwtProvider jwtProvider;

    @Autowired
    PasswordEncoder encoder;

    @Value("${jwtSecretKey}")
    private String jwtSecret;

    @Value("${jwtExpireTime}")
    private int jwtExpiration;

    private String authenticationWithJwt(String email, String password) {
        Authentication authentication = authenticationManager.authenticate(
                new UsernamePasswordAuthenticationToken(email, password));

        SecurityContextHolder.getContext().setAuthentication(authentication);

        return jwtProvider.generateJwtToken(authentication);
    }

    private JWTEntity saveJwt(String token) {
        JWTEntity jwtEntity = new JWTEntity();
        jwtEntity.setToken(token);
        return jwtRepository.save(jwtEntity);
    }

    @Override
    public ServiceResult signUpCustomer(String email, String password, String fullName, String phoneNumber) {
        ServiceResult result = new ServiceResult();
        StatusEntity activeStatus = statusRepository.findByName(StatusName.ACTIVE);
        boolean isEmailExist = employeeRepository.existsByEmail(email);
        if (isEmailExist) {
            if (employeeRepository.existsByEmailAndDeleted(email, true)) {
                result.setStatus(ServiceResult.Status.FAILED);
                result.setMessage("This email cannot be used to sign up");
            } else {
                result.setStatus(ServiceResult.Status.FAILED);
                result.setMessage(CustomerSignUpConst.EMAIL_EXIST);
            }
        } else {
            if (fullName != null && phoneNumber != null && email != null && password != null && activeStatus != null) {
                EmployeeEntity employee = new EmployeeEntity(fullName, phoneNumber, email,
                        encoder.encode(password),
                        activeStatus);
                employee.setRole(roleRepository.findByName(RoleName.ROLE_CUSTOMER));
                employee.setImageURL(ShopConst.DEFAULT_AVATAR);
                employeeRepository.save(employee);
                String jwt = authenticationWithJwt(email, password);
                CustomerSignInSignUpResponse response = new CustomerSignInSignUpResponse(employee.getId(),
                        employee.getFullName(),
                        employee.getPhoneNumber(),
                        employee.getRole().getName().name(),
                        employee.getImageURL(),
                        jwt);

                saveJwt(jwt);

                result.setMessage(CustomerSignUpConst.SUCCESS);
                result.setData(response);
            } else {
                result.setMessage(CustomerSignUpConst.NULL_DATA);
                result.setStatus(ServiceResult.Status.FAILED);
            }
        }
        return result;
    }

    @Override
    public ServiceResult signIn(String email, String password) {
        ServiceResult result = new ServiceResult();
        EmployeeEntity customer = employeeRepository.findByEmail(email).orElse(null);
        if (customer != null) {
            if (!customer.isDeleted()) {
                boolean isPasswordChecked = encoder.matches(password, customer.getPassword());
                if (isPasswordChecked) {
                    String jwt = authenticationWithJwt(email, password);
                    CustomerSignInSignUpResponse response = new CustomerSignInSignUpResponse(customer.getId(),
                            customer.getFullName(),
                            customer.getPhoneNumber(),
                            customer.getRole().getName().name(),
                            customer.getImageURL(),
                            jwt);

                    saveJwt(jwt);
                    result.setMessage(CustomerSignInConst.SUCCESS);
                    result.setData(response);
                } else {
                    result.setStatus(ServiceResult.Status.FAILED);
                    result.setMessage(CustomerSignInConst.EMAIL_PASSWORD_WRONG_FORMAT);
                }
            } else {
                result.setStatus(ServiceResult.Status.FAILED);
                result.setMessage("Cannot sign in with this account");
            }


        } else {
            result.setMessage(CustomerSignInConst.EMAIL_NOT_FOUND);
            result.setStatus(ServiceResult.Status.FAILED);
        }
        return result;
    }

    @Override
    public ServiceResult signOut(String token) {
        ServiceResult result = new ServiceResult();
        String authHeader = token.replace("Bearer ", "");
        JWTEntity jwt = jwtRepository.findByToken(authHeader).orElse(null);
        if (jwt != null) {
            jwtRepository.delete(jwt);
            result.setMessage("Sign out successfully");
        } else {
            result.setStatus(ServiceResult.Status.FAILED);
            result.setMessage("Cannot sign out");
        }
        return result;
    }

    @Override
    public ServiceResult getInfo(String token) {
        ServiceResult result = new ServiceResult();
        String authHeader = token.replace("Bearer ", "");
        EmployeeEntity customer = employeeRepository.findByEmail(getUserNameFromJwtToken(authHeader)).orElse(null);
        if (customer != null) {
            CustomerGetInfoResponse response = new CustomerGetInfoResponse(
                    customer.getId(),
                    customer.getFullName(),
                    customer.getPhoneNumber(),
                    customer.getEmail(),
                    customer.getImageURL());
            result.setData(response);
            result.setMessage("Get info successfully");
        } else {
            result.setStatus(ServiceResult.Status.FAILED);
            result.setMessage(CustomerConst.CUSTOMER_NOT_FOUND);
        }
        return result;
    }

    @Override
    public ServiceResult updateInfo(int id, String fullName, String phoneNumber, String password, String imageURL) {
        ServiceResult result = new ServiceResult();
        EmployeeEntity customer = employeeRepository.findByIdAndDeletedAndStatusNameAndRoleName(id, false,
                StatusName.ACTIVE, RoleName.ROLE_CUSTOMER);
        if (customer != null) {
            if (fullName != null && phoneNumber != null && password != null) {
                customer.setFullName(fullName);
                customer.setPhoneNumber(phoneNumber);
                if (!password.equals("")) {
                    customer.setPassword(encoder.encode(password));
                }
                if (imageURL.equals("")) {
                    customer.setImageURL(ShopConst.DEFAULT_AVATAR);
                }
                customer.setImageURL(imageURL);
                employeeRepository.save(customer);
                CustomerUpdateInfoResponse response = new CustomerUpdateInfoResponse(customer.getId(),
                        customer.getFullName(),
                        customer.getPhoneNumber(),
                        customer.getImageURL());
                result.setMessage("Update info successfully");
                result.setData(response);
            } else {
                result.setMessage("Fields cannot be empty");
                result.setStatus(ServiceResult.Status.FAILED);
            }
        } else {
            result.setMessage(CustomerConst.CUSTOMER_NOT_FOUND);
            result.setStatus(ServiceResult.Status.FAILED);
        }
        return result;
    }

    @Override
    public ServiceResult returnRole(String token) {
        ServiceResult result = new ServiceResult();
        String authHeader = token.replace("Bearer ", "");
        EmployeeEntity employee = employeeRepository.findByEmail(getUserNameFromJwtToken(authHeader)).orElse(null);
        if (employee != null) {
            result.setData(employee.getRole().getName().name());
        } else result.setStatus(ServiceResult.Status.FAILED);
        return result;
    }

 
    private double calculatePrice(int quantity, double price, double discount) {
        return (price - price * discount / 100) * quantity;
    }

    private String getUserNameFromJwtToken(String token) {
        return Jwts.parser()
                .setSigningKey(jwtSecret)
                .parseClaimsJws(token)
                .getBody().getSubject();
    }
}
