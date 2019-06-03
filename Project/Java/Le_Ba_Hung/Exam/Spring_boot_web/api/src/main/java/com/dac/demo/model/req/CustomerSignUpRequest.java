package com.dac.demo.model.req;

import lombok.Getter;
import lombok.Setter;

public class CustomerSignUpRequest {

    @Getter
    @Setter
    private String email;

    @Getter
    @Setter
    private String password;

    @Getter
    @Setter
    private String fullName;

    @Getter
    @Setter
    private String phoneNumber;
}
