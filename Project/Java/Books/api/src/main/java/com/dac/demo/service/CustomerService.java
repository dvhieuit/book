package com.dac.demo.service;

import com.dac.demo.model.ServiceResult;

public interface CustomerService {
    ServiceResult signUpCustomer(String email, String password, String firstName, String lastName);
    ServiceResult signIn(String email, String password);
    ServiceResult signOut(String token);
    ServiceResult getInfo(String token);
    ServiceResult returnRole(String token);
    ServiceResult updateInfo(int id, String firstName, String lastName, String password, String imageURL);
}
