<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230211153119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_house (character_id BIGINT UNSIGNED NOT NULL, house_id BIGINT UNSIGNED NOT NULL, INDEX IDX_9916DEFF1136BE75 (character_id), INDEX IDX_9916DEFF6BB74515 (house_id), PRIMARY KEY(character_id, house_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE house_character (house_id BIGINT UNSIGNED NOT NULL, character_id BIGINT UNSIGNED NOT NULL, INDEX IDX_68CD6EEA6BB74515 (house_id), INDEX IDX_68CD6EEA1136BE75 (character_id), PRIMARY KEY(house_id, character_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE character_house ADD CONSTRAINT FK_9916DEFF1136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_house ADD CONSTRAINT FK_9916DEFF6BB74515 FOREIGN KEY (house_id) REFERENCES house (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE house_character ADD CONSTRAINT FK_68CD6EEA6BB74515 FOREIGN KEY (house_id) REFERENCES house (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE house_character ADD CONSTRAINT FK_68CD6EEA1136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `character` DROP house_id');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034C5B3395B FOREIGN KEY (id_title) REFERENCES title (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034B78A354D FOREIGN KEY (mother_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB0342055B9A2 FOREIGN KEY (father_id) REFERENCES `character` (id)');
        $this->addSql('DROP INDEX fk_937ab034b78a354d ON `character`');
        $this->addSql('CREATE INDEX character_mother_id_foreign ON `character` (mother_id)');
        $this->addSql('DROP INDEX fk_937ab0342055b9a2 ON `character`');
        $this->addSql('CREATE INDEX character_father_id_foreign ON `character` (father_id)');
        $this->addSql('ALTER TABLE house_has_characters ADD CONSTRAINT FK_1B7C67EC67D5399D FOREIGN KEY (house) REFERENCES house (id)');
        $this->addSql('ALTER TABLE house_has_characters ADD CONSTRAINT FK_1B7C67EC937AB034 FOREIGN KEY (`character`) REFERENCES `character` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_house DROP FOREIGN KEY FK_9916DEFF1136BE75');
        $this->addSql('ALTER TABLE character_house DROP FOREIGN KEY FK_9916DEFF6BB74515');
        $this->addSql('ALTER TABLE house_character DROP FOREIGN KEY FK_68CD6EEA6BB74515');
        $this->addSql('ALTER TABLE house_character DROP FOREIGN KEY FK_68CD6EEA1136BE75');
        $this->addSql('DROP TABLE character_house');
        $this->addSql('DROP TABLE house_character');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034C5B3395B');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034B78A354D');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB0342055B9A2');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034B78A354D');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB0342055B9A2');
        $this->addSql('ALTER TABLE `character` ADD house_id BIGINT UNSIGNED NOT NULL');
        $this->addSql('DROP INDEX character_father_id_foreign ON `character`');
        $this->addSql('CREATE INDEX FK_937AB0342055B9A2 ON `character` (father_id)');
        $this->addSql('DROP INDEX character_mother_id_foreign ON `character`');
        $this->addSql('CREATE INDEX FK_937AB034B78A354D ON `character` (mother_id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034B78A354D FOREIGN KEY (mother_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB0342055B9A2 FOREIGN KEY (father_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE house_has_characters DROP FOREIGN KEY FK_1B7C67EC67D5399D');
        $this->addSql('ALTER TABLE house_has_characters DROP FOREIGN KEY FK_1B7C67EC937AB034');
    }
}
