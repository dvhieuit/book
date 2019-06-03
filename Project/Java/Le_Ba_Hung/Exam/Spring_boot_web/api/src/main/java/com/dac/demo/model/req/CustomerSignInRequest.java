package com.dac.demo.model.req;

import lombok.Getter;
import lombok.Setter;

public class CustomerSignInRequest {
    @Getter
    @Setter
    private String email;

    @Getter
    @Setter
    private String password;
}
