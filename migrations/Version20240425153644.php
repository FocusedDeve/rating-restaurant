<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425153644 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurent ADD city_id INT NOT NULL');
        $this->addSql('ALTER TABLE restaurent ADD CONSTRAINT FK_EC9CBAE38BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_EC9CBAE38BAC62AF ON restaurent (city_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurent DROP FOREIGN KEY FK_EC9CBAE38BAC62AF');
        $this->addSql('DROP INDEX IDX_EC9CBAE38BAC62AF ON restaurent');
        $this->addSql('ALTER TABLE restaurent DROP city_id');
    }
}
