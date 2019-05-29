package com.dac.demo.model.resp;

import lombok.Getter;
import lombok.Setter;

public class CustomerSignInSignUpResponse {

    @Getter
    @Setter
    private int id;

    @Getter
    @Setter
    private String fullName;

    @Getter
    @Setter
    private String phoneNumber;

    @Getter
    @Setter
    private String role;

    @Getter
    @Setter
    private String imageURL;

    @Getter
    @Setter
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
