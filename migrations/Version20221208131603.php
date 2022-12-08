<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221208131603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_magasin ADD ID_CLIENT INT DEFAULT NULL, ADD ID_MAGASIN INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client_magasin ADD CONSTRAINT FK_6921B5A6A0C96CB FOREIGN KEY (ID_CLIENT) REFERENCES client (ID)');
        $this->addSql('ALTER TABLE client_magasin ADD CONSTRAINT FK_6921B5A78DB893E FOREIGN KEY (ID_MAGASIN) REFERENCES magasin (ID)');
        $this->addSql('CREATE INDEX client_magasin_client_fk ON client_magasin (ID_CLIENT)');
        $this->addSql('CREATE INDEX client_magasin_magasin_fk ON client_magasin (ID_MAGASIN)');
        $this->addSql('CREATE UNIQUE INDEX client_magasin_uq ON client_magasin (ID_CLIENT, ID_MAGASIN)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_magasin DROP FOREIGN KEY FK_6921B5A6A0C96CB');
        $this->addSql('ALTER TABLE client_magasin DROP FOREIGN KEY FK_6921B5A78DB893E');
        $this->addSql('DROP INDEX client_magasin_client_fk ON client_magasin');
        $this->addSql('DROP INDEX client_magasin_magasin_fk ON client_magasin');
        $this->addSql('DROP INDEX client_magasin_uq ON client_magasin');
        $this->addSql('ALTER TABLE client_magasin DROP ID_CLIENT, DROP ID_MAGASIN');
    }
}
