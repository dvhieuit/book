package com.dac.demo.model.resp;

import lombok.Getter;
import lombok.Setter;
@Setter
@Getter
public class AdminGetAllCustomerResponse {
    private int id;
    private String firstName;
    private String lastName;
    private String email;
    private String status;

    public AdminGetAllCustomerResponse(int id, String firstName, String lastName, String email, String status) {
        this.id = id;
        this.firstName = firstName;
        this.lastName = lastName;
        this.email = email;
        this.status = status;
    }
}
