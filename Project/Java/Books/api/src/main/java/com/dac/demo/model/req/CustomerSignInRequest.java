package com.dac.demo.model.req;

import lombok.Getter;
import lombok.Setter;
@Getter
@Setter
public class CustomerSignInRequest {
    private String email;
    private String password;
}
