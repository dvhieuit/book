package com.dac.demo.service.impl;

import com.dac.demo.constant.AdminUserCreateConst;
import com.dac.demo.entity.*;
import com.dac.demo.model.ServiceResult;
import com.dac.demo.model.enums.RoleName;
import com.dac.demo.model.resp.*;
import com.dac.demo.repository.*;
import com.dac.demo.service.AdminService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;


@Service
public class AdminServiceImpl implements AdminService {

    @Autowired
    EmployeeRepository employeeRepository;

    @Autowired
    PasswordEncoder encoder;

    private AdminGetAllCustomerResponse createGetAllCustomerResponse(EmployeeEntity entity) {
        return new AdminGetAllCustomerResponse(entity.getId(),
                entity.getFullName(),
                entity.getPhoneNumber(),
                entity.getEmail(),
                entity.getStatus().getName().name());

    }

    private List<AdminGetAllCustomerResponse> createCustomerGetResponseList() {
        List<EmployeeEntity> customerList = employeeRepository.findByDeletedAndRoleName(false,
                RoleName.ROLE_CUSTOMER);
        List<AdminGetAllCustomerResponse> responseList = new ArrayList<>();
        for (EmployeeEntity entity : customerList) {
            responseList.add(createGetAllCustomerResponse(entity));
        }
        return responseList;
    }

    @Override
    public ServiceResult getAllCustomer() {
        ServiceResult result = new ServiceResult();
        List<AdminGetAllCustomerResponse> employeeEntityList = createCustomerGetResponseList();
        result.setMessage("Get all customers successfully");
        result.setData(employeeEntityList);
        return result;
    }

    @Override
    public ServiceResult createEmployee(String fullName, String phoneNumber, String email, String password,
                                        String imageURL, String statusName, String roleName) {
        ServiceResult result = new ServiceResult();
        if (fullName != null && phoneNumber != null && email != null && password != null &&
                statusName != null && roleName != null) {


                boolean isEmailExisted = employeeRepository.existsByEmail(email);
                if (!isEmailExisted) {
                    EmployeeEntity employee = new EmployeeEntity(fullName, phoneNumber, email,
                            encoder.encode(password),
                            imageURL);
                    employeeRepository.save(employee);
                    AdminCreateUserResponse response = new AdminCreateUserResponse(employee.getId(),
                            employee.getFullName(),
                            employee.getPhoneNumber(),
                            employee.getEmail(),
                            employee.getImageURL());

                    result.setMessage(AdminUserCreateConst.SUCCESS);
                    result.setData(response);
                } else {
                    result.setStatus(ServiceResult.Status.FAILED);
                    result.setMessage(AdminUserCreateConst.EMAIL_EXIST);
                }
        } else {
            result.setMessage(AdminUserCreateConst.NULL_DATA);
            result.setStatus(ServiceResult.Status.FAILED);
        }

        return result;
    }
}
