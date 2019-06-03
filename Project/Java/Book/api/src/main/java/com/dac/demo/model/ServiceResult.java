package com.dac.demo.model;

public class ServiceResult {
    private Status status = Status.SUCCESS;
    private String message;
    private Object data;

    public com.dac.demo.model.ServiceResult.Status getStatus() {
        return this.status;
    }

    public String getMessage() {
        return this.message;
    }

    public Object getData() {
        return this.data;
    }

    public void setStatus(com.dac.demo.model.ServiceResult.Status status) {
        this.status = status;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public void setData(Object data) {
        this.data = data;
    }

    public enum Status {
        SUCCESS, FAILED
    }

}
