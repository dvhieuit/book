package com.dac.demo.model.resp;

import lombok.Getter;
import lombok.Setter;

public class CustomerGetInfoResponse {

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

    public CustomerGetInfoResponse(int id, String fullName, String phoneNumber, String imageURL) {
        this.id = id;
        this.fullName = fullName;
        this.imageURL = imageURL;
    }

    public CustomerGetInfoResponse(int id, String fullName, String phoneNumber, String email, String imageURL) {
        this.id = id;
        this.fullName = fullName;
        this.email = email;
        this.imageURL = imageURL;
    }
}
