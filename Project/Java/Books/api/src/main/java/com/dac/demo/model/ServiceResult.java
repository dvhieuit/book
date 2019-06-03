package com.dac.demo.model;

import lombok.Getter;
import lombok.Setter;
@Getter
@Setter
public class ServiceResult<T> {

    private Status status = Status.SUCCESS;
    private String message;
    private T data;

    public enum Status {
        SUCCESS, FAILED
    }

}
