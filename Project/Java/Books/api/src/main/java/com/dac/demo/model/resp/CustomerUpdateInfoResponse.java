package com.dac.demo.model.resp;

import lombok.Getter;
import lombok.Setter;
@Getter
@Setter
public class CustomerUpdateInfoResponse {

    private int id;
    private String fullName;
    private String phoneNumber;
    private String imageURL;

    public CustomerUpdateInfoResponse(int id, String fullName, String phoneNumber, String imageURL) {
        this.id = id;
        this.fullName = fullName;
        this.phoneNumber = phoneNumber;
        this.imageURL = imageURL;
    }
}
