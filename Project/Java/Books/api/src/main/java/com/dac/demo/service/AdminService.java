package com.dac.demo.service;

import com.dac.demo.model.ServiceResult;
import com.dac.demo.model.req.AdminCreateProductRequest;
import com.dac.demo.model.resp.AdminCreateProductResponse;

public interface AdminService {
    ServiceResult createEmployee(String fullName, String phoneNumber, String email, String password, String imageURL, String statusName, String roleName);
    ServiceResult getAllCustomer();

    ServiceResult getAllProducts();

    ServiceResult<AdminCreateProductResponse> createProduct(AdminCreateProductRequest request);
}
