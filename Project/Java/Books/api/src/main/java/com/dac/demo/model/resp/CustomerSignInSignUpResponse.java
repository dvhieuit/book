package com.dac.demo.model.resp;

import lombok.Getter;
import lombok.Setter;
@Getter
@Setter
public class CustomerSignInSignUpResponse {
    private int id;
    private String fullName;
    private String phoneNumber;
    private String role;
    private String imageURL;
    private String token;

    public CustomerSignInSignUpResponse(int id, String fullName, String phoneNumber, String role, String imageURL, String token) {
        this.id = id;
        this.fullName = fullName;
        this.phoneNumber = phoneNumber;
        this.role = role;
        this.imageURL = imageURL;
        this.token = token;
    }
}
