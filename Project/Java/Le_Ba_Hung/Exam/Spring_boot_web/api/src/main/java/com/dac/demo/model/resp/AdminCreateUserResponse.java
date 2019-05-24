package com.dac.demo.model.resp;

import lombok.Getter;
import lombok.Setter;

public class AdminCreateUserResponse {

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
    private String email;

    @Getter
    @Setter
    private String imageURL;

    public AdminCreateUserResponse(int id, String fullName, String phoneNumber, String email, String imageURL) {
        this.id = id;
        this.fullName = fullName;
        this.phoneNumber = phoneNumber;
        this.email = email;
        this.imageURL = imageURL;
    }
}
