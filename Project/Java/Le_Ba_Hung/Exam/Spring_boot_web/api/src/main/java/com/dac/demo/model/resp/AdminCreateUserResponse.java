package com.dac.demo.model.resp;

import lombok.Getter;
import lombok.Setter;

public class AdminCreateUserResponse {

    @Getter
    @Setter
    private int id;

    @Getter
    @Setter
    private String firstName;

    @Getter
    @Setter
    private String lastName;

    @Getter
    @Setter
    private String email;

    @Getter
    @Setter
    private String imageURL;

    public AdminCreateUserResponse(int id, String firstName, String lastName, String email, String imageURL) {
        this.id = id;
        this.firstName = firstName;
        this.lastName = lastName;
        this.email = email;
        this.imageURL = imageURL;
    }
}
