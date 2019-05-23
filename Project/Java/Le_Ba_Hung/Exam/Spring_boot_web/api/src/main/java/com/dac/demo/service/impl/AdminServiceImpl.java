package com.dac.demo.service.impl;

import com.dac.demo.constant.AdminUserCreateConst;
import com.dac.demo.entity.*;
import com.dac.demo.model.ServiceResult;
import com.dac.demo.model.resp.*;
import com.dac.demo.repository.*;
import com.dac.demo.service.AdminService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;


@Service
public class AdminServiceImpl implements AdminService {

    @Autowired
    EmployeeRepository employeeRepository;

    @Autowired
    PasswordEncoder encoder;

     @Override
    public ServiceResult createEmployee(String firstName, String lastName, String email, String password,
                                        String imageURL, String statusName, String roleName) {
        ServiceResult result = new ServiceResult();
        if (firstName != null && lastName != null && email != null && password != null &&
                statusName != null && roleName != null) {


                boolean isEmailExisted = employeeRepository.existsByEmail(email);
                if (!isEmailExisted) {
                    EmployeeEntity employee = new EmployeeEntity(firstName, lastName, email,
                            encoder.encode(password),
                            imageURL);
                    employeeRepository.save(employee);
                    AdminCreateUserResponse response = new AdminCreateUserResponse(employee.getId(),
                            employee.getFirstName(),
                            employee.getLastName(),
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
