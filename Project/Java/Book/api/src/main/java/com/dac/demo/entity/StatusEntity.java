package com.dac.demo.entity;

import com.dac.demo.model.enums.StatusName;

import javax.persistence.*;
import java.util.List;

@Entity
@Table(name = "status")
public class StatusEntity {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;

    @Enumerated(EnumType.STRING)
    private StatusName name;


    public StatusEntity() {
    }
	
	@OneToMany(mappedBy = "status")
    private List<EmployeeEntity> employeeEntityList;

    public int getId() {
        return this.id;
    }

    public StatusName getName() {
        return this.name;
    }

    public List<EmployeeEntity> getEmployeeEntityList() {
        return this.employeeEntityList;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setName(StatusName name) {
        this.name = name;
    }

    public void setEmployeeEntityList(List<EmployeeEntity> employeeEntityList) {
        this.employeeEntityList = employeeEntityList;
    }
}