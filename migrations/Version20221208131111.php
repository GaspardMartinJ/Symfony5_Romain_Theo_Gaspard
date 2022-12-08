<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221208131111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_materiel ADD ID_CLIENT INT DEFAULT NULL, ADD ID_MATERIEL INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client_materiel ADD CONSTRAINT FK_363480546A0C96CB FOREIGN KEY (ID_CLIENT) REFERENCES client (ID)');
        $this->addSql('ALTER TABLE client_materiel ADD CONSTRAINT FK_3634805447FB4C4F FOREIGN KEY (ID_MATERIEL) REFERENCES materiel (ID)');
        $this->addSql('CREATE INDEX client_materiel_client_fk ON client_materiel (ID_CLIENT)');
        $this->addSql('CREATE INDEX client_materiel_materielr_fk ON client_materiel (ID_MATERIEL)');
        $this->addSql('CREATE UNIQUE INDEX client_materiel_uq ON client_materiel (ID_CLIENT, ID_MATERIEL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_materiel DROP FOREIGN KEY FK_363480546A0C96CB');
        $this->addSql('ALTER TABLE client_materiel DROP FOREIGN KEY FK_3634805447FB4C4F');
        $this->addSql('DROP INDEX client_materiel_client_fk ON client_materiel');
        $this->addSql('DROP INDEX client_materiel_materielr_fk ON client_materiel');
        $this->addSql('DROP INDEX client_materiel_uq ON client_materiel');
        $this->addSql('ALTER TABLE client_materiel DROP ID_CLIENT, DROP ID_MATERIEL');
    }
}
