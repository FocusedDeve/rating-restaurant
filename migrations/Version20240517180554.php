<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240517180554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, restaurent_id INT NOT NULL, parent_id INT DEFAULT NULL, message VARCHAR(255) NOT NULL, rating INT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_8F91ABF02A763278 (restaurent_id), INDEX IDX_8F91ABF0727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_restaurent (id INT AUTO_INCREMENT NOT NULL, restaurent_id INT NOT NULL, INDEX IDX_8042ADD52A763278 (restaurent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurent (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_EC9CBAE38BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF02A763278 FOREIGN KEY (restaurent_id) REFERENCES restaurent (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0727ACA70 FOREIGN KEY (parent_id) REFERENCES avis (id)');
        $this->addSql('ALTER TABLE image_restaurent ADD CONSTRAINT FK_8042ADD52A763278 FOREIGN KEY (restaurent_id) REFERENCES restaurent (id)');
        $this->addSql('ALTER TABLE restaurent ADD CONSTRAINT FK_EC9CBAE38BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF02A763278');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0727ACA70');
        $this->addSql('ALTER TABLE image_restaurent DROP FOREIGN KEY FK_8042ADD52A763278');
        $this->addSql('ALTER TABLE restaurent DROP FOREIGN KEY FK_EC9CBAE38BAC62AF');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE image_restaurent');
        $this->addSql('DROP TABLE restaurent');
    }
}
