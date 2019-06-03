package com.dac.demo.entity;

import lombok.Getter;
import lombok.Setter;

import javax.persistence.*;

@Getter
@Setter
@Entity
@Table(name = "product")
public class ProductEntity {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;
    private String name;
    private Integer price;
    @Column(name = "quanity")
    private Integer quantity;
    private String description;
    private String image;
    private Integer catalogId;
    private Integer userId;
}
