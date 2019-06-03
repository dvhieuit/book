package com.dac.demo.repository;

import com.dac.demo.entity.RoleEntity;
import com.dac.demo.model.enums.RoleName;
import org.springframework.data.repository.CrudRepository;

public interface RoleRepository extends CrudRepository<RoleEntity, Integer> {
    RoleEntity findByName(RoleName roleName);
}
