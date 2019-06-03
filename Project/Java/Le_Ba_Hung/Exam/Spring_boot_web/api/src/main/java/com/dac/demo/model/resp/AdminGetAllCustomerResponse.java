package com.dac.demo.model.resp;

import lombok.Getter;
import lombok.Setter;

public class AdminGetAllCustomerResponse {
    @Setter
    @Getter
    private int id;

    @Setter
    @Getter
    private String firstName;

    @Setter
    @Getter
    private String lastName;

    @Setter
    @Getter
    private String email;

    @Setter
    @Getter
    private String status;

    public AdminGetAllCustomerResponse(int id, String firstName, String lastName, String email, String status) {
        this.id = id;
        this.firstName = firstName;
        this.lastName = lastName;
        this.email = email;
        this.status = status;
    }
}
