package com.dac.demo.model.resp;

import lombok.Getter;
import lombok.Setter;

public class CustomerUpdateInfoResponse {

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
    private String imageURL;

    public CustomerUpdateInfoResponse(int id, String fullName, String phoneNumber, String imageURL) {
        this.id = id;
        this.fullName = fullName;
        this.phoneNumber = phoneNumber;
        this.imageURL = imageURL;
    }
}
