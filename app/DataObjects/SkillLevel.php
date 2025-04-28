<?php
namespace App\DataObjects;
enum SkillLevel
{
    case Beginner;
    case Intermediate;
    case Advanced;
    case Expert;


    public static function fromSting(string $level): SkillLevel
    {
        return match (strtolower($level)) {
            'junior', 'beginner', 'freshman', 'novice' => self::Beginner,
            'intermediate', 'medium', 'mid-level' => self::Intermediate,
            'senior', 'advanced', 'confirmed' => self::Advanced,
            'expert', 'master' => self::Expert,
        };
    }

    public function title(): string
    {
        return match ($this) {
            self::Beginner => 'Beginner',
            self::Intermediate => 'Intermediate',
            self::Advanced => 'Advanced',
            self::Expert => 'Expert',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Beginner => 'bg-green-100 text-green-800',
            self::Intermediate => 'bg-emerald-100 text-emerald-800',
            self::Advanced => 'bg-blue-100 text-blue-800',
            self::Expert => 'bg-sky-100 text-sky-800',
        };
    }
}