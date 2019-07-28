<?php
namespace Phooty\Console\Artwork;

class AsciiSherrin
{
    protected const SHERRIN = <<<EOT
    <fg=red;bg=black;options=bold;>

         <fg=red;bg=red;options=bold;>OOOOO</>  
       <fg=red;bg=red;options=bold;>OOOOOOOOO</>
      <fg=red;bg=red;options=bold;>OOOO <fg=white;bg=red;options=bold>|</> OOOO</>
      <fg=red;bg=red;options=bold;>OOO <fg=white;bg=red;options=bold>=|=</> OOO</>
      <fg=red;bg=red;options=bold;>OOO <fg=white;bg=red;options=bold>=|=</> OOO</>
      <fg=red;bg=red;options=bold;>OOOO <fg=white;bg=red;options=bold>|</> OOOO</>
       <fg=red;bg=red;options=bold;>OOOOOOOOO</>
         <fg=red;bg=red;options=bold;>OOOOO</>  
    </>
EOT;

    public static function render()
    {
        return self::SHERRIN;
    }
}
