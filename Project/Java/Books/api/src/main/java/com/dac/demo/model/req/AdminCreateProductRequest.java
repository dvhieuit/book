package com.dac.demo.model.req;

import lombok.Getter;
import lombok.Setter;

@Getter
@Setter
public class AdminCreateProductRequest {
    private String name;
    private Integer price;
    private Integer quantity;
    private String description;
    private String image;
    private Integer catalogId;
    private Integer userId;
}
