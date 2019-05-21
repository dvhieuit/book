package io.spring.batch.configuration;

import io.spring.batch.listener.JobNoticeCompletionListener;
import io.spring.batch.model.User;
import io.spring.batch.processor.UserItemProcessor;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.batch.core.Job;
import org.springframework.batch.core.Step;
import org.springframework.batch.core.configuration.annotation.EnableBatchProcessing;
import org.springframework.batch.core.configuration.annotation.JobBuilderFactory;
import org.springframework.batch.core.configuration.annotation.StepBuilderFactory;
import org.springframework.batch.core.launch.support.RunIdIncrementer;
import org.springframework.batch.item.database.BeanPropertyItemSqlParameterSourceProvider;
import org.springframework.batch.item.database.JdbcBatchItemWriter;
import org.springframework.batch.item.file.FlatFileItemReader;
import org.springframework.batch.item.file.mapping.BeanWrapperFieldSetMapper;
import org.springframework.batch.item.file.mapping.DefaultLineMapper;
import org.springframework.batch.item.file.transform.DelimitedLineTokenizer;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.autoconfigure.batch.BatchProperties;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.core.io.ClassPathResource;

import javax.sql.DataSource;

@Configuration
@EnableBatchProcessing
public class BatchConfiguration {
    private static final Logger log = LoggerFactory.getLogger(BatchConfiguration.class);

    @Autowired
    public JobBuilderFactory jobBuilderFactory;

    @Autowired
    public StepBuilderFactory stepBuilderFactory;

    @Autowired
    public DataSource dataSource;


    @Bean
    public Job importUserJob(JobNoticeCompletionListener listener) {
        log.info("start job");
        return jobBuilderFactory.get("importUserJob")
                .incrementer(new RunIdIncrementer())
                .listener(listener)
                .flow(step1())
                .end()
                .build();
    }

    @Bean
    public Step step1() {
        log.info("start step");
        return stepBuilderFactory.get("step1")
                .<User, User> chunk(10)
                .reader(reader())
                .processor(processor())
                .writer(writer())
                .build();
    }

    @Bean
    public FlatFileItemReader<User> reader() {
        log.info("read file");
        FlatFileItemReader<User> reader = new FlatFileItemReader<>();
        reader.setResource(new ClassPathResource("user-data.csv"));
        reader.setLineMapper(new DefaultLineMapper<User>(){{
            setLineTokenizer(new DelimitedLineTokenizer(){{
                setNames(new String[]{"id","firstName", "lastName", "email","phone","address"});
            }});
            setFieldSetMapper(new BeanWrapperFieldSetMapper<User>(){{
                setTargetType(User.class);
            }});
        }});
        return reader;
    }

    @Bean
    public UserItemProcessor processor() {
        return new UserItemProcessor();
    }

    @Bean
    public JdbcBatchItemWriter<User> writer() {
        log.info("write database");
        JdbcBatchItemWriter<User> writer = new JdbcBatchItemWriter<>();
        writer.setItemSqlParameterSourceProvider(new BeanPropertyItemSqlParameterSourceProvider<>());
        writer.setSql("INSERT INTO user(id, first_name, last_name,email, phone, address) VALUES (:id, :firstName, :lastName, :email, :phone, :address)");
        writer.setDataSource(dataSource);
        return writer;
    }
}
