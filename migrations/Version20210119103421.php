<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210119103421 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lang (
            id INT AUTO_INCREMENT NOT NULL,
            code VARCHAR(255) NOT NULL,
            PRIMARY KEY(id)) 
            DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('CREATE TABLE lang_has_user (
            id INT AUTO_INCREMENT NOT NULL,
            lang_code VARCHAR(255) NOT NULL,
            user_id INT NOT NULL, 
            PRIMARY KEY(id)) 
            DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('CREATE TABLE project (
            id INT AUTO_INCREMENT NOT NULL,
            project VARCHAR(255) NOT NULL, user_id INT NOT NULL, 
            lang_code VARCHAR(255) NOT NULL, 
            PRIMARY KEY(id)) 
            DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('CREATE TABLE traduction_source (
            id INT AUTO_INCREMENT NOT NULL, 
            project_id INT NOT NULL, 
            source VARCHAR(255) DEFAULT NULL,
            PRIMARY KEY(id)) 
            DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('CREATE TABLE traduction_target (
            id INT AUTO_INCREMENT NOT NULL, 
            lang_code VARCHAR(255) NOT NULL, 
            traduction_source_id INT NOT NULL, 
            PRIMARY KEY(id)) 
            DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (
            id INT AUTO_INCREMENT NOT NULL, 
            first_name VARCHAR(255) NOT NULL, 
            last_name VARCHAR(255) NOT NULL, 
            email VARCHAR(255) NOT NULL, password VARCHAR(500) NOT NULL, 
            roles JSON NOT NULL, 
            PRIMARY KEY(id)) 
            DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE lang');
        $this->addSql('DROP TABLE lang_has_user');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE traduction_source');
        $this->addSql('DROP TABLE traduction_target');
        $this->addSql('DROP TABLE users');
    }
}
