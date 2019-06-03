package com.dac.demo.model.req;

import lombok.Getter;
import lombok.Setter;
@Getter
@Setter
public class CustomerSignUpRequest {
    private String email;
    private String password;
    private String fullName;
    private String phoneNumber;
}
