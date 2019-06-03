package com.dac.demo.repository;

import com.dac.demo.entity.StatusEntity;
import com.dac.demo.model.enums.StatusName;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface StatusRepository extends JpaRepository<StatusEntity, Integer> {
    StatusEntity findByName(StatusName statusName);
}
