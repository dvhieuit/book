package com.dac.demo.model.resp;

public class CustomerGetInfoResponse {

    private int id;

    private String fullName;

    private String phoneNumber;

    private String email;

    private String imageURL;

    public CustomerGetInfoResponse(int id, String fullName, String phoneNumber, String imageURL) {
        this.id = id;
        this.fullName = fullName;
        this.imageURL = imageURL;
    }

    public CustomerGetInfoResponse(int id, String fullName, String phoneNumber, String email, String imageURL) {
        this.id = id;
        this.fullName = fullName;
        this.email = email;
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

    public String getEmail() {
        return this.email;
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

    public void setEmail(String email) {
        this.email = email;
    }

    public void setImageURL(String imageURL) {
        this.imageURL = imageURL;
    }
}
