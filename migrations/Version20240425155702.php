<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425155702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image_restaurent ADD restaurent_id INT NOT NULL');
        $this->addSql('ALTER TABLE image_restaurent ADD CONSTRAINT FK_8042ADD52A763278 FOREIGN KEY (restaurent_id) REFERENCES restaurent (id)');
        $this->addSql('CREATE INDEX IDX_8042ADD52A763278 ON image_restaurent (restaurent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image_restaurent DROP FOREIGN KEY FK_8042ADD52A763278');
        $this->addSql('DROP INDEX IDX_8042ADD52A763278 ON image_restaurent');
        $this->addSql('ALTER TABLE image_restaurent DROP restaurent_id');
    }
}
