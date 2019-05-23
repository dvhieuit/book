package com.dac.demo.entity;

import lombok.Getter;
import lombok.Setter;

import javax.persistence.*;


@Entity
@Table(name = "employee")
@Getter
@Setter
public class EmployeeEntity {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;
    @Column
    private String firstName;
    @Column
    private String lastName;
    @Column
    private String email;
    @Column
    private String password;
    @Column
    private String imageURL;
    @Column
    private boolean deleted = false;

    @ManyToOne
    @JoinColumn(name = "statusID")
    private StatusEntity status;

    @ManyToOne(fetch = FetchType.EAGER)
    @JoinColumn(name = "roleID")
    private RoleEntity role;

    public EmployeeEntity() {
        this.id = 0;
    }

    public EmployeeEntity(String firstName, String lastName, String email, String password, String imageURL) {
        this.firstName = firstName;
        this.lastName = lastName;
        this.email = email;
        this.password = password;
        this.imageURL = imageURL;
    }
    public EmployeeEntity(String firstName, String lastName, String email, String password, StatusEntity status) {
        this.firstName = firstName;
        this.lastName = lastName;
        this.email = email;
        this.password = password;
        this.status = status;
    }

    public EmployeeEntity(String firstName, String lastName, String email, String password, String imageURL, StatusEntity status, RoleEntity role) {
        this.firstName = firstName;
        this.lastName = lastName;
        this.email = email;
        this.password = password;
        this.imageURL = imageURL;
        this.status = status;
        this.role = role;
    }
}
