package com.dac.demo.entity;

import lombok.Getter;
import lombok.Setter;

import javax.persistence.*;


@Entity
@Table(name = "user")
@Getter
@Setter
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
}
