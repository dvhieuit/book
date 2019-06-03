package com.dac.demo.model.req;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.Setter;
@Getter
@Setter
@AllArgsConstructor
public class AdminCreateUserRequest {
    private String fullName;
    private String phoneNumber;
    private String email;
    private String password;
    private String imageURL;
    private String status;
    private String role;
}
