<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240425161049 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis ADD restaurent_id INT NOT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF02A763278 FOREIGN KEY (restaurent_id) REFERENCES restaurent (id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF02A763278 ON avis (restaurent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF02A763278');
        $this->addSql('DROP INDEX IDX_8F91ABF02A763278 ON avis');
        $this->addSql('ALTER TABLE avis DROP restaurent_id');
    }
}
