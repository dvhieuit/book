package com.dac.demo.model;

import lombok.Getter;
import lombok.Setter;

public class ServiceResult {
    @Getter
    @Setter
    private Status status = Status.SUCCESS;
    @Getter
    @Setter
    private String message;
    @Getter
    @Setter
    private Object data;

    public enum Status {
        SUCCESS, FAILED
    }

}
