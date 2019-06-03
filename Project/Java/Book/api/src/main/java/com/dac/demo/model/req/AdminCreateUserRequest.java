package com.dac.demo.model.req;

public class AdminCreateUserRequest {
    private String fullName;
    private String phoneNumber;
    private String email;
    private String password;
    private String imageURL;
    private String status;
    private String role;

    public String getFullName() {
        return this.fullName;
    }

    public String getPhoneNumber() {
        return this.phoneNumber;
    }

    public String getEmail() {
        return this.email;
    }

    public String getPassword() {
        return this.password;
    }

    public String getImageURL() {
        return this.imageURL;
    }

    public String getStatus() {
        return this.status;
    }

    public String getRole() {
        return this.role;
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

    public void setPassword(String password) {
        this.password = password;
    }

    public void setImageURL(String imageURL) {
        this.imageURL = imageURL;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public void setRole(String role) {
        this.role = role;
    }
}
