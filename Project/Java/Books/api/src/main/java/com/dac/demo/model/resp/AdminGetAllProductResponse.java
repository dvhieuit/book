package com.dac.demo.model.resp;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.Setter;

@Getter
@Setter
@AllArgsConstructor
public class AdminGetAllProductResponse {
    private Integer id;
    private String name;
    private Integer price;
    private Integer quantity;
    private String description;
    private String image;
    private Integer catalogId;
    private Integer userId;
}
