package com.dac.demo.model.resp;

public class CustomerUpdateInfoResponse {

    private int id;

    private String fullName;

    private String phoneNumber;

    private String imageURL;

    public CustomerUpdateInfoResponse(int id, String fullName, String phoneNumber, String imageURL) {
        this.id = id;
        this.fullName = fullName;
        this.phoneNumber = phoneNumber;
        this.imageURL = imageURL;
    }

    public int getId() {
        return this.id;
    }

    public String getFullName() {
        return this.fullName;
    }

    public String getPhoneNumber() {
        return this.phoneNumber;
    }

    public String getImageURL() {
        return this.imageURL;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setFullName(String fullName) {
        this.fullName = fullName;
    }

    public void setPhoneNumber(String phoneNumber) {
        this.phoneNumber = phoneNumber;
    }

    public void setImageURL(String imageURL) {
        this.imageURL = imageURL;
    }
}
