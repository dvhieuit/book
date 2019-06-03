package com.dac.demo.entity;

import com.dac.demo.model.enums.RoleName;

import javax.persistence.*;

@Entity
@Table(name = "role")
public class RoleEntity {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;

    @Enumerated(EnumType.STRING)
    private RoleName name;

    public RoleEntity() {
    }

    public int getId() {
        return this.id;
    }

    public RoleName getName() {
        return this.name;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setName(RoleName name) {
        this.name = name;
    }
}
