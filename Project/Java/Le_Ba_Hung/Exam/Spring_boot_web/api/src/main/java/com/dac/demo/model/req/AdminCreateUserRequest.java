package com.dac.demo.model.req;

import lombok.Getter;
import lombok.Setter;

public class AdminCreateUserRequest {
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
    private String password;
    @Getter
    @Setter
    private String imageURL;
    @Getter
    @Setter
    private String status;
    @Getter
    @Setter
    private String role;
}
