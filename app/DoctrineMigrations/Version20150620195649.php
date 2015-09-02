<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150620195649 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cable ADD image_id INT DEFAULT NULL, DROP imageUrl');
        $this->addSql('ALTER TABLE cable ADD CONSTRAINT FK_24E9C4D43DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_24E9C4D43DA5256D ON cable (image_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cable DROP FOREIGN KEY FK_24E9C4D43DA5256D');
        $this->addSql('DROP INDEX UNIQ_24E9C4D43DA5256D ON cable');
        $this->addSql('ALTER TABLE cable ADD imageUrl VARCHAR(255) DEFAULT NULL, DROP image_id');
    }
}
