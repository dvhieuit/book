package com.dac.demo.entity;

import javax.persistence.*;


@Entity
@Table(name = "user")
public class EmployeeEntity {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;
    @Column(name = "full_name")
    private String fullName;
    @Column(name = "phone_number")
    private String phoneNumber;
    @Column
    private String email;
    @Column(name = "pass")
    private String password;
    @Column(name = "imageURL")
    private String imageURL;
    @Column
    private boolean deleted = false;

    @ManyToOne
    @JoinColumn(name = "status_id")
    private StatusEntity status;

    @ManyToOne(fetch = FetchType.EAGER)
    @JoinColumn(name = "role_id")
    private RoleEntity role;

    public EmployeeEntity() {
        this.id = 0;
    }

    public EmployeeEntity(String fullName, String phoneNumber, String email, String password, String imageURL) {
        this.fullName = fullName;
        this.phoneNumber = phoneNumber;
        this.email = email;
        this.password = password;
        this.imageURL = imageURL;
    }
    public EmployeeEntity(String fullName, String phoneNumber, String email, String password, StatusEntity status) {
        this.fullName = fullName;
        this.phoneNumber = phoneNumber;
        this.email = email;
        this.password = password;
        this.status = status;
    }

    public EmployeeEntity(String fullName, String phoneNumber, String email, String password, String imageURL, StatusEntity status, RoleEntity role) {
        this.fullName = fullName;
        this.phoneNumber = phoneNumber;
        this.email = email;
        this.password = password;
        this.imageURL = imageURL;
        this.status = status;
        this.role = role;
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

    public String getPassword() {
        return this.password;
    }

    public String getImageURL() {
        return this.imageURL;
    }

    public boolean isDeleted() {
        return this.deleted;
    }

    public StatusEntity getStatus() {
        return this.status;
    }

    public RoleEntity getRole() {
        return this.role;
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

    public void setPassword(String password) {
        this.password = password;
    }

    public void setImageURL(String imageURL) {
        this.imageURL = imageURL;
    }

    public void setDeleted(boolean deleted) {
        this.deleted = deleted;
    }

    public void setStatus(StatusEntity status) {
        this.status = status;
    }

    public void setRole(RoleEntity role) {
        this.role = role;
    }
}
