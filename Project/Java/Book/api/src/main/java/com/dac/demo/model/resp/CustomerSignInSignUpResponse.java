package com.dac.demo.model.resp;

public class CustomerSignInSignUpResponse {

    private int id;

    private String fullName;

    private String phoneNumber;

    private String role;

    private String imageURL;

    private String token;

    public CustomerSignInSignUpResponse(int id, String fullName, String phoneNumber, String role, String imageURL, String token) {
        this.id = id;
        this.fullName = fullName;
        this.phoneNumber = phoneNumber;
        this.role = role;
        this.imageURL = imageURL;
        this.token = token;
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

    public String getRole() {
        return this.role;
    }

    public String getImageURL() {
        return this.imageURL;
    }

    public String getToken() {
        return this.token;
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

    public void setRole(String role) {
        this.role = role;
    }

    public void setImageURL(String imageURL) {
        this.imageURL = imageURL;
    }

    public void setToken(String token) {
        this.token = token;
    }
}
