package com.dac.demo.service;

import com.dac.demo.model.ServiceResult;

public interface AdminService {
    ServiceResult createEmployee(String fullName, String phoneNumber, String email, String password, String imageURL, String statusName, String roleName);
}
