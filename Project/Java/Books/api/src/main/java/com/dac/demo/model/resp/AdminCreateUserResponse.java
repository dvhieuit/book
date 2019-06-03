package com.dac.demo.model.resp;

import lombok.Getter;
import lombok.Setter;
@Getter
@Setter
public class AdminCreateUserResponse {
    private int id;
    private String fullName;
    private String phoneNumber;
    private String email;
    private String imageURL;

    public AdminCreateUserResponse(int id, String fullName, String phoneNumber, String email, String imageURL) {
        this.id = id;
        this.fullName = fullName;
        this.phoneNumber = phoneNumber;
        this.email = email;
        this.imageURL = imageURL;
    }
}
