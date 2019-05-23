package com.dac.demo.entity;

import com.dac.demo.model.enums.StatusName;
import lombok.Getter;
import lombok.Setter;

import javax.persistence.*;

@Entity
@Table(name = "status")
public class StatusEntity {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Setter
    @Getter
    private int id;

    @Enumerated(EnumType.STRING)
    @Setter
    @Getter
    private StatusName name;


    public StatusEntity() {
    }

}