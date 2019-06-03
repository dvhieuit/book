package com.dac.demo.entity;

import com.dac.demo.model.enums.RoleName;
import lombok.Getter;
import lombok.Setter;

import javax.persistence.*;

@Entity
@Table(name = "role")
public class RoleEntity {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Getter
    @Setter
    private int id;

    @Enumerated(EnumType.STRING)
    @Getter
    @Setter
    private RoleName name;

    public RoleEntity() {
    }

}
