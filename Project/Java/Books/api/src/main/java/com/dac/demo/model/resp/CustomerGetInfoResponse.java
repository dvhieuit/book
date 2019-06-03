package com.dac.demo.model.resp;

import lombok.Getter;
import lombok.Setter;
@Getter
@Setter
public class CustomerGetInfoResponse {
    private int id;
    private String fullName;
    private String phoneNumber;
    private String email;
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
